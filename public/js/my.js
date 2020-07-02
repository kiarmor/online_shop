/** Confirm delete*/
$('.delete').click(function () {
    let res = confirm('Confirm delete');
    if (!res)return false;
});

/** Delete from DataBase*/
$('.deleteDB').click(function () {
    let res = confirm('NOW YOU DELETE ORDER FROM DATABASE!!! You can\'t undo this !!!');
    if (res){
        let res_1 = confirm('ARE YOU SURE???');
        if (!res_1) return false;
    }
    if (!res)return false;
});