<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Tìm các đối tượng có class btn-delete
        $('.btn-delete').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Bạn chắc chắn muốn xoá chứ?",
                text: "Lưu ý! Sẽ không thể khôi phục!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Huỷ"
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "delete.php?id=" + id;
                }
            });
        });
    });

    $(document).ready(function() {
        // Tìm các đối tượng có class btn-delete
        $('.refresh').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Bạn chắc chắn muốn làm mới chứ?",
                text: "Lưu ý! Sẽ không thể khôi phục!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Huỷ"
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "delete.php?p_id=" + id;
                }
            });
        });
    });

    $(document).ready(function() {
        // Tìm các đối tượng có class btn-delete
        $('.stop-btn').click(function(event) {
            event.preventDefault();
            var id = $(this).data('phong_id');
            Swal.fire({
                title: "Bạn chắc chắn muốn đóng chứ?",
                text: "Hành động này sẽ kết thúc phiên và lưu hoá đơn",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Huỷ"
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "dongphong.php?phong_id=" + id;
                }
            });
        });
    });

    setInterval(() => {
        fetch('/admin/hoadon/xoahoadon.php')
            .then(response => response.json())
            .then(data => console.log("Xóa dữ liệu:", data.message))
            .catch(error => console.error("Lỗi:", error));
    }, 86400000); // 24 giờ

    function kiemTraNgay() {
        let startDate = document.getElementById("dp_ngayden").value;
        let endDate = document.getElementById("dp_ngaydi").value;

        if (startDate && endDate) {
            if (new Date(startDate) > new Date(endDate)) {
                Swal.fire({
                    title: "Ngày đến không thể sau ngày đi !",
                    text: "Vui lòng kiểm tra lại!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Đồng ý",
                    cancelButtonText: "Huỷ"
                });
            }
        } 
    }
</script>