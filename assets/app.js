/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

function toggle(select, attribute, button, content) {
    let array = [];
    let svg = document.querySelectorAll(select);
    for (let i = 0; i < svg.length; i++) {
        let getNumber = svg[i].getAttribute(attribute);
        array.push(getNumber);
    }

    for (let i = 0; i < array.length; i++) {
        let btn = document.getElementById(`${button}-${array[i]
            }`);
        let cnt = document.getElementById(`${content}-${array[i]
            }`);

        btn.addEventListener("click", () => {
            if (getComputedStyle(cnt).display != "none") {
                cnt.style.display = "none";
            } else {
                cnt.style.display = "flex";
            }
        })

    }

}

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
