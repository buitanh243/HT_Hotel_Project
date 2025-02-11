// scroll

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
        threshold: 0.5, // Kích hoạt khi % phần tử hiển thị trong viewport
      }
    );
  
    // Theo dõi tất cả các phần tử
    elements.forEach((element) => observer.observe(element));
  });