function showAnh_ThemBV(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#themBV_Img').attr('src', e.target.result).width(725).height(450);
          $('#themBV_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showAnh_SuaBV(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#suaBV_Img').attr('src', e.target.result).width(725).height(450);
            $('#suaBV_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showAnh_ThemTKUser(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#themTKUser_Img').attr('src', e.target.result).width(725).height(450);
            $('#themTKUser_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showAnh_SuaTKUser(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#suaTKUser_Img').attr('src', e.target.result).width(725).height(450);
            $('#suaTKUser_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showAnh_ThemTKAdmin(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#themTKAdmin_Img').attr('src', e.target.result).width(725).height(450);
            $('#themTKAdmin_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showAnh_SuaTKAdmin(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#suaTKAdmin_Img').attr('src', e.target.result).width(725).height(450);
            $('#suaTKAdmin_ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}