/*$('.register').mouseenter(function () {
    $('.holder').addClass('open');
});
$('.registerbutton').mouseleave(function () {
    $('.holder').removeClass('open');
});*/


window.onload = function () {
    $pwcorrect = false;
    func1();
    func2();
}
function start() {

}
function func1() {//RegisterRun
    document.getElementById("regbtn").addEventListener("mouseover", run);
    function run() {
        var btn = document.getElementById("regbtn");
        if (!$pwcorrect) {
            if (!btn.style.left) {
                btn.style.left = "300px";
            } else {
                var posLeft = parseInt(btn.style.left);
                if (posLeft <= 300) {
                    btn.style.left = (posLeft + 500) + "px";
                } else if (posLeft > 900) {
                    btn.style.left = (posLeft - 500) + "px";
                }
                else {
                    btn.style.left = "300px";
                }
            }
        }
        else {
            btn.style.left = "550px";
        }
    }
}
function func2() {
    document.getElementsByName("password")[0].addEventListener('change', CheckPassword);

    function CheckPassword() {
        var passw = /^[A-Za-z]\w{7,14}$/;
        if (this.value.match(passw)) {
            $("regform").submit();
            $pwcorrect = true;
            document.getElementById("regbtn").removeEventListener("mouseover", run);
        }
        else {
            alert('PW muss zwischen 7-20 Zeichen lang sein, muss mit einem Buchstaben beginnen und darf keine Sonderzeichen enthalten');
            $pwcorrect = false;
            return false;
        }
    }
}
function setAction(form) {
    form.action = "./src/Model/User/signup.php";
    if ($pwcorrect) {
        return false;
    } else {
        return form.action;
    }
}


/*funktionierender Code für PW Check
    
    
*/