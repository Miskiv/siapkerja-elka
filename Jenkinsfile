pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "miskiv/siapkerja-elka"   // Ganti sesuai repo DockerHub kamu
        DOCKER_TAG = "latest"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://github.com/Miskiv/siapkerja-elka.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    dockerImage = docker.build("${DOCKER_IMAGE}:${DOCKER_TAG}")
                }
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'DockerLogin', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh """
                    echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                    docker push ${DOCKER_IMAGE}:${DOCKER_TAG}
                    docker logout
                    """
                }
            }
        }

        stage('Deploy to Server 192.168.8.110') {
            steps {
                sshagent(['DeploymentSSHKey']) {
                    sh """
                    ssh -o StrictHostKeyChecking=no ubuntu@192.168.8.110 '
                        docker pull ${DOCKER_IMAGE}:${DOCKER_TAG} &&
                        docker stop siapkerja || true &&
                        docker rm siapkerja || true &&
                        docker run -d --name siapkerja --env-file /home/ubuntu/siapkerja/.env -p 3000:3000 ${DOCKER_IMAGE}:${DOCKER_TAG}
                    '
                    """
                }
            }
        }
    }

    post {
        success {
            echo '✅ Deployment berhasil!'
        }
        failure {
            echo '❌ Deployment gagal!'
        }
    }
}
