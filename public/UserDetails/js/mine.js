const button = document.getElementById("revise-button");
let first_name = document.getElementById("first_name")
let last_name = document.getElementById("last_name")
let country_code = document.getElementById("country_code")
let phone = document.getElementById("phone")
let email = document.getElementById("email")
let country = document.getElementById("country")
let city = document.getElementById("city")
let street = document.getElementById("street")
let house_number = document.getElementById("house_number")
let door_number = document.getElementById("door_number")
let post_code = document.getElementById("post_code")
let submit = document.getElementById("submit")
//
button.onclick = () => {
    try {
        first_name.removeAttribute("readonly")
        last_name.removeAttribute("readonly")
        country_code.removeAttribute("readonly")
        phone.removeAttribute("readonly")
        email.removeAttribute("readonly")
        country.removeAttribute("readonly")
        city.removeAttribute("readonly")
        street.removeAttribute("readonly")
        house_number.removeAttribute("readonly")
        door_number.removeAttribute("readonly")
        post_code.removeAttribute("readonly")
        submit.removeAttribute('disabled')
    } catch (error){
        console.log(error) ;
    }

    //
    button.remove()
    //
}


//
// < input
// type = "submit"
// className = "submit" >
//     < !---- >
//     < p
// className = "revise" > Revise < /p>


