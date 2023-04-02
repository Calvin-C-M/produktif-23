const deleteData = (id) => {
    fetch(`/user/${id}`, {
        method: "DELETE"
    })
    .then(res => res.json())
    .then(data => {
        location.reload()
    })
    .catch(err => console.log(err))
}