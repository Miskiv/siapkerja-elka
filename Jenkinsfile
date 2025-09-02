pipeline {
    agent any

    environment {
        DOCKER_HUB_REPO = "miskiv/laravel-app"
        DEPLOY_SERVER = "ubuntu@192.168.8.110"
        DEPLOY_PATH = "/var/www/laravel-app"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://github.com/username/laravel-project.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t $DOCKER_HUB_REPO:$BUILD_NUMBER .'
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-cred', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh 'echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin'
                    sh 'docker push $DOCKER_HUB_REPO:$BUILD_NUMBER'
                }
            }
        }

        stage('Deploy to Server') {
            steps {
                sshagent (credentials: ['server-ssh-key']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no $DEPLOY_SERVER "
                            docker pull $DOCKER_HUB_REPO:$BUILD_NUMBER &&
                            docker stop laravel-app || true &&
                            docker rm laravel-app || true &&
                            docker run -d --name laravel-app -p 9000:9000 $DOCKER_HUB_REPO:$BUILD_NUMBER
                        "
                    '''
                }
            }
        }
    }
}
