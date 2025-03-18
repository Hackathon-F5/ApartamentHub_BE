## ⚙️ Installation prerequisites

🟢Install [Node.js](https://nodejs.org/en/download/source-code)

🟢Install [Composer](https://getcomposer.org/download/)

## 🛞 Installation Guide 

-1: Before installing the project, you have to create a database, in my case i have used mysql with xampp as host.

-2: Open the terminal and paste this command:

`git clone git@github.com:Hackathon-F5/ApartamentHub_BE.git`

⚠️ Be careful, you have to be in the folder you want this project cloned at!

-3: After you have cloned the repository, rename the file `.env.example` to `.env` and adjust the database configuration to yours.


-4: Last but not least, open three terminals in bash and execute the following commands

▷Console 1:
    `npm install` and after `npm run dev`
    
▷Console 2:
    `composer install` and after `php artisan serve`
    
▷Console 3: 
    `php artisan migrat:fresh` and after `php artisan migrat:fresh --seed`
    
-And that should be it, just open the browser and insert the url the server has provided you

⚠️ If you have done the previous steps and something has gone wrong please go back to the third command console and insert this:

`php artisan key:generate` and after `php artisan config:cache`