 // Chức năng chọn tất cả checkbox
 document.getElementById('selectAll').addEventListener('change', function() {
    let checkboxes = document.querySelectorAll('.select-class');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});