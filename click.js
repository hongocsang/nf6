$(function(){
    //var favDialog = document.getElementById('favDialog');
    $('td').click(function(){
        $('td').removeClass('current');
        $(this).addClass('current');
        console.log(this.id);       
    });
    
});




// $(document).ready(function() {
//     $('td').click(function() {
//         $('td').removeClass('current');
//         $(this).addClass('current');
//             $.post('index.php', {
//                 tdID: this.id
//             },function(ketqua) {
//                 $('#noidung').html(ketqua);
//             });
            
//     });
//})

// $(document).ready(function() 
// {
//     $('td').click(function(e) 
//     {
//         e.preventDefault();
//         $('td').removeClass('current');
//         $(this).addClass('current');
//         favDialog.showModal();
//         console.log(this.id);   
//         // $.ajax(
//         // {
//         //     url: 'index.php',
//         //     type: 'POST',
//         //     data: "tdID=" + this.id,
//         //     success : function(data)
//         //     { 
//         //        if(data == 'false') 
//         //        {
//         //          alert('không có data');
//         //        }else{
//         //         $('#noidung').html(data);
//         //        }
//         //     }
//         //      });
//         //     return false;
//         $("#noidung").load("index.php", {tdID: this.id}, callback);
//         function callback(){
//         }
//     });
// });;

// $(document).ready(function( ){
//     $("#noidung").load("index.php", {user: admin}, callback);
//  });
//  function callback(){
//     alert("Kết thúc quá trình.");
//  }