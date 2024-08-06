pipeline {
    agent any

    stages {
        stage('Update Repositories') {
            steps {
                script {
                    def directories = [
                        "/var/www/html/ec2-instance",
                        "/var/www/html/jenkins-one",
                        "/var/www/html/jenkins-two",
                        "/var/www/html/jenkins-three"
                    ]

                    for (dir in directories) {
                        echo "Actualizando repositorio en ${dir}..."

                        // Ejecutar comandos en el directorio
                        sh """
                            cd ${dir} || { echo "No se pudo acceder al directorio ${dir}"; exit 1; }

                            if [ -d ".git" ]; then
                                git pull origin main

                                if [ $? -ne 0 ]; then
                                    echo "Error al hacer git pull en ${dir}."
                                    exit 1
                                fi

                                echo "Repositorio en ${dir} actualizado correctamente."
                            else
                                echo "El directorio ${dir} no es un repositorio Git."
                            fi
                        """
                    }
                }
            }
        }

        stage('Update Composer') {
            steps {
                script {
                    def directories = [
                        "/var/www/html/ec2-instance",
                        "/var/www/html/jenkins-one",
                        "/var/www/html/jenkins-two",
                        "/var/www/html/jenkins-three"
                    ]

                    for (dir in directories) {
                        echo "Actualizando composer en ${dir}..."

                        // Ejecutar comandos en el directorio
                        sh """
                            cd ${dir} || { echo "No se pudo acceder al directorio ${dir}"; exit 1; }

                            sh 'composer up'
                        """
                    }
                }
            }
        }

        // stage('Run PHP Scripts') {
        //     steps {
        //         dir('/var/www/html/ec2-instance') {
        //             // Ejecutar los scripts PHP
        //             sh 'php /var/www/html/ec2-instance/script/CreateHelloWorldMessage.php'
        //         }
        //     }
        // }
    }

    post {
        success {
            echo 'Pipeline executed correctly'
        }
        failure {
            echo 'Pipeline failed'
        }
        always {
            echo 'Pipeline finished'
        }
    }
}
