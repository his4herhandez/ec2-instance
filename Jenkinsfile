pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/ec2-instance') {
                    sh '/var/www/html/ec2-instance/scripts/update_repo.sh'
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline executed correctly'
        }
        failure {
            echo 'Pipeline failed'
        }
    }
}
