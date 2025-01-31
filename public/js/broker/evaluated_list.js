function filterAnnouncementsTable() {
  const status = document.getElementById('statusFilter').value;
  const rows = document.querySelectorAll('tbody tr');

  rows.forEach(row => {
    const statusCell = row.querySelector('td:nth-child(3)');
    const statusText = statusCell.textContent.trim().toLowerCase();

    if (status === 'all' ||
      (status === 'approved' && statusText === 'aprovado') ||
      (status === 'rejected' && statusText === 'recusado')) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}