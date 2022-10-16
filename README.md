## Cloud Deployment 

The following instructions explain how to run the application locally using Docker. 

By repeating the process on a VPS, for instance a Digital Ocean droplet, the application can be easily be deployed at will.


### Prerequisites

* This instruction assumes Ubuntu 20.04 as the operating system.
* [Install Docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04):

```
$ sudo apt update
$ sudo apt install apt-transport-https ca-certificates curl software-properties-common
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
$ sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
$ sudo apt install docker-ce
```

* Check if the installation worked:

`$ sudo systemctl status docker`

* Configure Docker so you can use it with a non-root user:

```
$ sudo usermod -aG docker ${USER}
$ su - ${USER}
```

* Confirm that it worked (the group `docker` should be printed):

`$ groups`

* Test that Docker works properly:

`$ docker run hello-world`

* [Install Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04):

```
$ sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
$ sudo chmod +x /usr/local/bin/docker-compose
```

* Verify that the installation was successful:

`$ docker-compose --version`


## Running the application

* After the repo has been cloned, `cd` into the top-level directory. For example:

`$ cd ~/dev/Acow`

* Copy the example `.env` file:

`cp .env.example .env`

* Modify and save the `.env` file to contain the database credentials (set the DB password):

```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=acow
DB_USERNAME=acow_user
DB_PASSWORD=    # Set password
```

* While staying in this folder, build the `app` image:

`$ docker-compose build app`

* Run the environment in background mode:

`$ docker-compose up -d`

* Install all dependencies in the `app` container with `composer`:

`$ docker-compose exec app composer install`

* Generate a unique application key with `artisan`:

`$ docker-compose exec app php artisan key:generate`

* Run the database migration:

`$ docker-compose exec app php artisan migrate`

* Visit the application in your browser by navigating to (`localhost` if running locally):

`http://server_domain_or_IP`

* To shut down the environment:

`$ docker-compose down`


### Troubleshooting

#### DB exit code 137

* Initially I deployed to Digital Ocean with a droplet of only 512MB RAM. This caused the `mysql` container to get stuck 
  in a restart loop (exit code 137) due to insufficient RAM. Resizing the droplet to 2GB resolved the issue.


#### `docker-compose` hangs for no aparrent reason

* Install:

`sudo apt install -y haveged`


### Resources

* [How To Install and Set Up Laravel with Docker Compose on Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04)
