let buttons = document.querySelectorAll(".options_btn")
console.log(buttons)

buttons.forEach(element => {
    element.addEventListener("click", ()=>{
        buttons.forEach(btn => btn.classList.remove("button_clicked") )
        element.classList.toggle("button_clicked")
        console.log("toggeled")
    })
})