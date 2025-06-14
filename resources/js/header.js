// drop down avatar
const dropdownUserAvatarButton = document.getElementById("dropdownUserAvatarButton");
const dropdownAvatar = document.getElementById("dropdownAvatar");

dropdownUserAvatarButton.addEventListener("click" , ()=>{
    if (dropdownAvatar.classList.contains("hidden")) {
        dropdownAvatar.classList.remove("hidden");

        // hidden dropdown Notification
        dropdownNotification.classList.add("hidden");

        //hidden logo sidebar
        logosidebar.classList.remove("-translate-x-0");
        logosidebar.classList.add("-translate-x-full");

    }else{
        dropdownAvatar.classList.add("hidden");
    }
});

//drop down notification
const dropdownNotificationButton = document.getElementById("dropdownNotificationButton");
const dropdownNotification = document.getElementById("dropdownNotification");

dropdownNotificationButton.addEventListener("click" , ()=>{
    if(dropdownNotification.classList.contains("hidden")){
        dropdownNotification.classList.remove("hidden");

        //hidden drop down avatar
        dropdownAvatar.classList.add("hidden");

        //hidden logo sidebar
        logosidebar.classList.remove("-translate-x-0");
        logosidebar.classList.add("-translate-x-full");
    }else{
        dropdownNotification.classList.add("hidden");
    }
});


//logo sidebar button
const logosidebarbutton = document.getElementById("logosidebarbutton");
const logosidebar = document.getElementById("logo-sidebar");

logosidebarbutton.addEventListener("click" , ()=>{
    if(logosidebar.classList.contains("-translate-x-full")){
        logosidebar.classList.remove("-translate-x-full");
        logosidebar.classList.add("-translate-x-0");

        // hidden drop down notification
        dropdownNotification.classList.add("hidden");

        // hidden drop down avatar
        dropdownAvatar.classList.add("hidden");
    }else{
        logosidebar.classList.remove("-translate-x-0");
        logosidebar.classList.add("-translate-x-full");
    }
});
