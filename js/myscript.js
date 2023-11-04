$(document).ready(function()
{   
    console.log('in script')
    $(document).on('click','.cat_delete',function(event)
    {
        event.preventDefault();
        let status=confirm("Are you sure to delete cat?");
        console.log(status);

        if(status)
        {        //name                         //value
            let id=$(this).parent().attr('id')//--->get id
            // console.log("id is" + id)

            $.ajax({
                method:'post',
                url:'delete_category.php',
                 // name:value
                data:{id:id},
                success:function(response)
                {
                    if(response=="success")
                    {   
                        alert('successfully deleted');
                        location.href="category.php";
                    }
                    else
                    {
                    alert(response);
                    }
                },
                error:function(error)
                {
                    
                }
            })
        }
    })

   
    $(document).on('click','.inst_delete',function(event)
    {
        event.preventDefault();
        let status=confirm("Are you sure to delete?");
        console.log(status);

        if(status)
        {        //name                         //value
            let id=$(this).parent().attr('id')//--->get id
            // console.log("id is" + id)

            $.ajax({
                method:'post',
                url:'delete_instructor.php',
                 // name:value
                data:{id:id},
                success:function(response)
                {
                    console.log(response);
                    if(response=="success")
                    {
                        alert("successfully");
                        location.href="instructor.php";
                    }
                },
                error:function(error)
                {

                }
            })
        }
    })

    $('#table').DataTable();

})

