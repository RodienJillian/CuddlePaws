function showSection(sectionId) {
    // Hide all sections
    var sections = document.querySelectorAll('.content-section');
    sections.forEach(function(section) {
        section.classList.remove('active');
    });

    // Show the selected section
    var activeSection = document.getElementById(sectionId);
    activeSection.classList.add('active');
}

