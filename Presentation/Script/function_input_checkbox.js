
/**
 * Cache la table précédentes lors du déroulement d'un autre
 * 
 * @param {object} section 
 * @param {integer} id 
 */
function hide_section(section, id) {
    if (!input_checkbox.checked) {
        div_section = Array.from(
            document.getElementsByClassName(
                config["general"]["sectionDefaultClassName"]
            )
        );
        div_section.forEach(element => {
            if (element.id != id) {
                element.parentNode.style.backgroundColor =
                    config["general"]["div_sectionDefault"];
                element.style.fontWeight = 'normal';
                element.firstChild.nextSibling.style.transform = "rotate(180deg)";
                element.style.borderBottom  = "none";

                
                table_container = element.parentNode.querySelector(".table-container");
                table_container.style.display = "none"
            }

        });
    }
}

