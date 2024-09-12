document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.sidebar a');
    const sections = document.querySelectorAll('.content-section');

    // Khi nhấp vào liên kết
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Lấy giá trị của thuộc tính data-content
            const contentId = this.getAttribute('data-content');

            // Ẩn tất cả các phần nội dung
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Hiển thị phần nội dung được chọn
            const contentSection = document.getElementById(contentId);
            if (contentSection) {
                contentSection.classList.add('active');
            }
        });
    });
});
