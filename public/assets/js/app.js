// تأكيد حذف
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("confirm-delete")) {
    if (!confirm("متأكد بدك تكمل؟")) {
      e.preventDefault();
    }
  }
});

// ربط مودال الرفض في لوحة الطبيب
document.addEventListener("show.bs.modal", (event) => {
  const modal = event.target;
  if (modal.id !== "rejectModal") return;

  const btn = event.relatedTarget;
  const id = btn?.getAttribute("data-id");
  const form = document.getElementById("rejectForm");
  if (form && id) {
    form.action = `/admin/appointments/${id}/reject`;
  }
});
