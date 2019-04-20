var lang = document.body.className;
console.log(lang);
if (lang == 'en') {
    console.log(en.title);
    document.getElementById('title_json').innerHTML = en.title;
    document.getElementById('navbar_brand_json').innerHTML = en.AdminStrap;
    document.getElementById('dashboard_json').innerHTML = en.Dashboard;
    document.getElementById('dashboarda_json').innerHTML = rw.Dashboard;
    document.getElementById('dashboardb_json').innerHTML = rw.Dashboard;
    document.getElementById('pages_json').innerHTML = en.Pages;
    document.getElementById('posts_json').innerHTML = en.Posts;
    document.getElementById('users_json').innerHTML = en.Users;
    document.getElementById('yoursite_json').innerHTML = en.yoursite;
    document.getElementById('dropdownMenuButton1').innerHTML = en.CreateContent;
    document.getElementById('addpages_json').innerHTML = en.AddPages;
    document.getElementById('addposts_json').innerHTML = en.AddPost;
    document.getElementById('AddUsers').innerHTML = en.AddUsers;
    document.getElementById('overview_json').innerHTML = en.overview;
    document.getElementById('logout_json').innerHTML = en.logout;

} else if (lang == 'rw') {
    console.log(rw.title);
    document.getElementById('title_json').innerHTML = rw.title;
    document.getElementById('navbar_brand_json').innerHTML = rw.AdminStrap;
    document.getElementById('dashboard_json').innerHTML = rw.Dashboard;
    document.getElementById('dashboarda_json').innerHTML = rw.Dashboard;
    document.getElementById('dashboardb_json').innerHTML = rw.Dashboard;
    document.getElementById('pages_json').innerHTML = rw.Pages;
    document.getElementById('posts_json').innerHTML = rw.Posts;
    document.getElementById('users_json').innerHTML = rw.Users;
    document.getElementById('yoursite_json').innerHTML = rw.yoursite;
    document.getElementById('dropdownMenuButton1').innerHTML = rw.CreateContent;
    document.getElementById('addpages_json').innerHTML = rw.AddPages;
    document.getElementById('addposts_json').innerHTML = rw.AddPost;
    document.getElementById('AddUsers').innerHTML = rw.AddUsers;
    document.getElementById('overview_json').innerHTML = rw.overview;
    document.getElementById('logout_json').innerHTML = rw.logout;
}