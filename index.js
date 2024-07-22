var login = document.querySelector('.login');
var login_modal = document.querySelector('.login_modal');
var login_reset = document.querySelector('#login_reset');
var join = document.querySelector('.join');
var join_modal = document.querySelector('.join_modal');
var join_reset = document.querySelector('#join_reset');

function modalFunction(a,b,c){
    a.addEventListener('click', () =>{
        b.style.display = c;
    })  
}
modalFunction(login, login_modal ,'block');
modalFunction(login, join_modal, 'none')
modalFunction(login_reset, login_modal ,'none');
modalFunction(join, join_modal, 'block');
modalFunction(join, login_modal, 'none');
modalFunction(join_reset, join_modal, 'none');

$(document).ready(function() {
    $("#check_id").click(function(){
        var uid = $("#joinid").val();
        if (uid.length < 4) {
            alert("아이디를 4글자 이상 입력해주세요.");
            return false;
        }
        $.ajax({
            url: "check_id.php",
            method: "POST",
            data: { joinid: uid },
            success: function(data) {
                console.log("Response from check_id.php:", data);
                if (data.trim() > 0) {
                    alert("중복된 아이디입니다.");
                } else {
                    alert("사용 가능한 아이디입니다.");
                    $("#idok").val(1);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", textStatus, errorThrown);
                alert("AJAX 요청 실패: " + textStatus + ", " + errorThrown);
            }
        });
    });

    $("#joinid").change(function(){
        $("#idok").val(0);
    });

    window.check = function(f) {
        if (f.idok.value != 1) {
            alert("중복확인을 먼저 진행해주세요.");
            return false;
        }
        return true;
    };
});

$("#join_btn").click(function(){
    var name = $("#name").val()
    var joinpw = $("#joinpw").val()
    var joinpw_check = $("#pw_check").val()
    if(name.length < 2){
        alert("이름을 2글자 이상 입력해주세요.");
        return false;
    }
    if(joinpw.length < 4){
        alert("비밀번호를 4글자 이상 입력해주세요.")
        return false
    }
    if(joinpw != joinpw_check){
        alert("비밀번호를 확인해주세요.")
        return false
    }
})