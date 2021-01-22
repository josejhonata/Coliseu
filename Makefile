init:

	cp .env.example .env
	composer install
	npm install
	php artisan key:generate
	nano .env
	php artisan migrate:fresh --seed
	php artisan serve

git-Eriston:
	git config --global user.name "eriston"
	git config --global user.email "erinstong@gmail.com"

git-Vinicius:
	git config --global user.name "augustofarias"
	git config --global user.email "vinicinho1237@gmail.com"

git-Herbert:
	git config --global user.name "HerberthSS"
	git config --global user.email "herberthfelipe1234@gmail.com"

git-John Lenon:
	git config --global user.name "johnlenon213"
	git config --global user.email "johnlenon029@gmail .com"

git-Candida:
	git config --global user.name "CandidAraujo"
	git config --global user.email "ccandida572@gmail.com"