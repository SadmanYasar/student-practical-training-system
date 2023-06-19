<h1>
    Student Practical Training System
</h1>

### Installation Guide

1. Create a folder on `C:\xampp\htdocs` and name it `webdevproject`.
2. Open the folder `webdevproject` in VSCode.
3. Clone this repository by running the following in a terminal (make sure you are inside the webdevproject folder).
```sh
git clone https://github.com/SadmanYasar/student-practical-training-system.git .
```
4. Download SB2 Admin Theme from [here](https://startbootstrap.com/theme/sb-admin-2).
5. Create a new folder named `bootstrap_resource` inside `webdevproject` folder and extract the files there.
6. Open XAMPP and start Apache and MySQL.
7. Go to `http://localhost/webdevproject/` in your browser.
8. The index.php should be displayed.
9. Create a new branch with your name and feature you are working on. For example,
```sh
// create a branch and switch to the branch
$ git checkout -b <branch-name>
```

I have already created some branches for you. You can see the list of branches from the repository page on the dropdown menu ![](https://github.com/SadmanYasar/student-practical-training-system/assets/67522140/935218a9-5b1b-44ce-9635-c615daee598c)

### Rules You Must Follow
1. Don't push to main branch directly.
2. Create a new branch for each feature you are working on.
3. Then create a pull request to merge your branch with main branch.
4. Check your current branch before pushing to remote.
```sh
// check current branch
$ git branch
```
5. Notify others then they can review your code and merge it with main branch.
