function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    Swal.fire({
        title: 'Bạn có chắc chắc muốn xóa thông tin đã chọn?',
        text: "Bạn sẽ không quay lại được!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có',
        denyButtonText: 'Không'
    }).then((result) => {
        // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
        // if (willDelete) {
        //     // Swal.fire("Poof! Your imaginary file has been deleted!", {
        //     //     icon: "success",
        //     // });
        //     // window.location.href = urlToRedirect;
        // } else {
        //     Swal.fire("Your imaginary file is safe!");
        // }
        console.log(result); // verify if this is the right URL
        if (result.isConfirmed) {
            window.location.href = urlToRedirect;
        }
        else if (result.isDismissed) {
            return;
        }
    });
}
