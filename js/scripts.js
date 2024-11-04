document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("slider");
  const overlay = document.querySelector(".comparison-overlay");
  let isDragging = false;

  slider.addEventListener("mousedown", () => (isDragging = true));
  window.addEventListener("mouseup", () => (isDragging = false));

  window.addEventListener("mousemove", (e) => {
    if (!isDragging) return;

    const rect = overlay.parentNode.getBoundingClientRect();
    let position = e.clientX - rect.left;
    if (position < 0) position = 0;
    if (position > rect.width) position = rect.width;

    slider.style.left = `${position}px`;
    overlay.style.width = `${position}px`;
  });
});
