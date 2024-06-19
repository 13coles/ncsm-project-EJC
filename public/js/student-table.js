$(document).ready(function() {
    $('.view-btn').on('click', function() {
        var studentId = $(this).data('id');
        $.ajax({
            url: '/students/' + studentId,
            type: 'GET',
            success: function(response) {
                var student = response.student;

                // Set modal title and course
                $('#updateModalLabel').text(student.fname + ' ' + student.lname);
                $('#studentCourse').text(student.course);

                // Populate personal information
                $('#personal-info-body').html(`
                    <tr>
                        <td class="px-4 py-2">${student.birthdate}</td>
                        <td class="px-4 py-2">${student.birthplace}</td>
                        <td class="px-4 py-2">${student.nationality}</td>
                        <td class="px-4 py-2">${student.gender}</td>
                        <td class="px-4 py-2">${student.civil_status}</td>
                        <td class="px-4 py-2">${student.education}</td>
                        <td class="px-4 py-2">${student.employment}</td>
                    </tr>
                `);

                // Populate address information
                $('#address-info-body').html(`
                    <tr>
                        <td class="px-4 py-2">${student.street_number}</td>
                        <td class="px-4 py-2">${student.district}</td>
                        <td class="px-4 py-2">${student.city}</td>
                        <td class="px-4 py-2">${student.zipcode}</td>
                    </tr>
                `);

                // Populate parent/guardian information
                if (student.parent) {
                    $('#parent-info-body').html(`
                        <tr>
                            <td class="px-4 py-2">${student.parent.pfname} ${student.parent.pmname} ${student.parent.plname} ${student.parent.psname}</td>
                            <td class="px-4 py-2">${student.parent.pstreet_number}</td>
                            <td class="px-4 py-2">${student.parent.pdistrictt}</td>
                            <td class="px-4 py-2">${student.parent.pmunicipality}</td>
                            <td class="px-4 py-2">${student.parent.pzipcode}</td>
                            <td class="px-4 py-2">${student.parent.pcontact_number}</td>
                        </tr>
                    `);
                }

                // Populate classification information
                if (student.classification && student.classification.length > 0) {
                    var classificationHtml = '';
                    student.classification.forEach(function (classification) {
                        classificationHtml += `
                            <tr>
                                <td class="px-4 py-2">${classification.classification_data}</td>
                            </tr>
                        `;
                    });
                    $('#classification-info-body').html(classificationHtml);
                }

                // Show modal
                $('#updateModal').modal('show');
            },
            error: function() {
                alert('Error retrieving student data.');
            }
        });
    });
});