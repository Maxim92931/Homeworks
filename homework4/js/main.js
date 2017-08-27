/**
 * Created by arku on 07.03.2017.
 */



/*console.log('Hello, World')
var selector = "div.homework4>h1";

var zagolovok = $(selector);
var zagovol_data = zagolovok.html()
zagolovok.html('ahaha')

console.log(zagovol_data);*/

/*$('#returnback').on('click', function(){
    // zagolovok.html(zagovol_data)

    $.ajax({
        url: '/data.php',
        method: 'post',
        data: {
            superdata: zagovol_data //$_POST['superdata']
        }
    }).done(function (data) {
        var json = JSON.parse(data);  //JSON.stringify()
        var str = json.name + ' - ' + json.occupation + json.superdata;
        zagolovok.html(str)
    });
})*/
$(document).ready(function () {
    var url = document.location.href;

    $.each($("#navbar ul li a"),function(){
        if(this.href === url){
            $('.active').removeClass('active');
            $(this).parent().addClass('active');
        }
    });


    $("#signup").submit(function (e) {
        e.preventDefault();
        $.ajax({
            //url: "http://homeworks/homework4/php/signup.php",
            url: "/homework4/php/signup.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (responce) {
                if (responce) {
                    window.location = "http://homeworks/homework4/index.php";
                } else {
                    $('.checkLogin').html('Пароли не совпадают');
                }
            }
        })
    });

    $("#signin").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/homework4/php/signin.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (responce) {
                console.log('r = ' + responce);
                if (responce == true) {
                    window.location = "profile.php";
                } else {

                }
            }
        })
    });


    $("#inputEmail3").change(function () {
        $.ajax({
            url: "/homework4/php/Db.php",
            type: 'POST',
            data: {
                action: 'checkLogin',
                login: $('#inputEmail3').val()
            },
            success: function (responce) {
                if (responce) {
                    $('#reg').removeAttr("disabled");
                    $('.checkLogin').html('');
                } else {
                    $('#reg').attr("disabled","disabled");
                    $('.checkLogin').html('Логин уже существует!');
                }
            }
        })
    });

    function save() {
        var fd = new FormData();
        fd.append('login', $('#name').val());
        fd.append('age', $('#age').val());
        fd.append('about', $('#about').val());
        fd.append('photo', $('#photo').prop('photo')[0]);

        $.ajax({
            url: "/homework4/php/Db.php",
            type: 'POST',
            data: {
                action: 'updateProfile',
                fd: fd
            }
        })
    }

    $('#save').click(function (e) {
        e.preventDefault();

        var fd = new FormData();
        fd.append('name', $('#name').val());
        fd.append('age', $('#age').val());
        fd.append('about', $('#about').val());
        fd.append('photo', $('#photo').prop('files')[0]);

        $.ajax({
            url: "/homework4/php/updateProfile.php",
            type: 'POST',
            processData: false,
            contentType: false,
            data: fd
        })
    });

});


