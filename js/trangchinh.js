function showContent(contentId) {
    // Ẩn tất cả các nội dung chính
    var contents = document.getElementsByClassName('main-content');
    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }

    // Hiển thị nội dung được chọn
    document.getElementById(contentId).style.display = 'block';

    // Ẩn phần chi tiết (card-detail) khi chuyển nội dung
    hideCardDetail();
}
function hideCardDetail() {
    document.getElementById('card-detail').style.display = 'none';
}


document.getElementById('detail').addEventListener('click', function() {
    // Tìm phần tử card-detail và hiển thị nó
    document.getElementById('card-detail').style.display = 'block';
});
