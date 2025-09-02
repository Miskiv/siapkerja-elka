pipeline {
    agent any

    environment {
        DOCKER_HUB_CREDENTIALS = credentials('dockerhub-credentials') 
        DEPLOY_SERVER = "ubuntu@192.168.8.110"
        APP_NAME = "siapkerja-elka"
        DOCKER_IMAGE = "miskiv/siapkerja-elka"
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Miskiv/siapkerja-elka.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build -t ${DOCKER_IMAGE}:${BUILD_NUMBER} ."
                }
            }
        }

        stage('Push to Docker Hub') {
            steps {
                script {
                    sh """
                        echo ${DOCKER_HUB_CREDENTIALS_PSW} | docker login -u ${DOCKER_HUB_CREDENTIALS_USR} --password-stdin
                        docker push ${DOCKER_IMAGE}:${BUILD_NUMBER}
                        docker tag ${DOCKER_IMAGE}:${BUILD_NUMBER} ${DOCKER_IMAGE}:latest
                        docker push ${DOCKER_IMAGE}:latest
                    """
                }
            }
        }

        stage('Deploy to Remote Server') {
            steps {
                script {
                    sshagent(['deploy-server-ssh']) {
                        sh """
                            ssh -o StrictHostKeyChecking=no ${DEPLOY_SERVER} \\
                                'docker pull ${DOCKER_IMAGE}:latest && \\
                                 docker stop ${APP_NAME} || true && \\
                                 docker rm ${APP_NAME} || true && \\
                                 docker run -d --name ${APP_NAME} -p 8080:8080 ${DOCKER_IMAGE}:latest'
                        """
                    }
                }
            }
        }
    }

    post {
        success {
            echo "Deployment sukses ke ${DEPLOY_SERVER}"
        }
        failure {
            echo "Deployment gagal, cek log!"
        }
    }
}

