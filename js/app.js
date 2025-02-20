// scroll
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

document.addEventListener("DOMContentLoaded", () => {
    
    const elements = document.querySelectorAll("body *");
  
    // Tạo Intersection Observer
    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            observer.unobserve(entry.target); 
          }
        });
      },
      {
        threshold: 0.5, 
      }
    );
  
    // Theo dõi tất cả các phần tử
    elements.forEach((element) => observer.observe(element));
  });

  flatpickr("#ngaynhan", {
    dateFormat: "d-m-Y",
    locale: "vi"
  });

  flatpickr("#ngaytra", {
    dateFormat: "d-m-Y",
    locale: "vi"
  });

  function kiemTraNgay() {
    let startDate = document.getElementById("ngaynhan").value;
    let endDate = document.getElementById("ngaytra").value;

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