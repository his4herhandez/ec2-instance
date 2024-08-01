pipeline {
    agent any

    environment {
        GIT_CREDENTIALS_ID = 'github-token'
    }

    stages {

        // stage('Update Repo') {
        //     steps {
        //         // Navegar al directorio del repositorio si es necesario
        //         dir('/var/www/html/ec2-jenkins') {
        //             // Actualizar el repositorio
        //             sh 'git pull origin main'
        //         }
        //     }
        // }

        stage('Pull Changes') {
            steps {
                script {
                dir('/var/www/html/ec2-jenkins') {
                        checkout([$class: 'GitSCM',
                            branches: [[name: '*/main']],
                            userRemoteConfigs: [[url: 'https://github.com/his4herhandez/panchos-api.git', credentialsId: "${GIT_CREDENTIALS_ID}"]]
                        ])
                    }
                }
            }
        }

        stage('Configure Git') {
            steps {
                withCredentials([usernamePassword(credentialsId: "${GIT_CREDENTIALS_ID}", usernameVariable: 'GIT_USERNAME', passwordVariable: 'GIT_PASSWORD')]) {
                    sh '''
                    git config --global user.name "${GIT_USERNAME}"
                    git config --global user.password "${GIT_PASSWORD}"
                    '''
                }
            }
        }

        stage('Run PHP Scripts') {
            steps {
                dir('/var/www/html/ec2-jenkins') {
                    // Ejecutar el script PHP
                    sh 'php /var/www/html/ec2-jenkins/script/CreateHelloWorldMessage.php'
                }
            }
        }
    }

    post {
        success {
            echo 'El pipeline se ejecutó correctamente.'
        }
        failure {
            echo 'El pipeline falló.'
        }
    }
}
