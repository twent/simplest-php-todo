const checkboxes = document.querySelectorAll(
    'input[type="checkbox"][name="completed"]'
)

checkboxes.forEach(checkbox => {
    checkbox.onclick = function () {
        this.parentNode.submit()
    }
})