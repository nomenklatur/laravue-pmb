export default {
    data() {
        return {
            
        }
    },
    methods: {
      async  apiRequest(method, url, data){
            try {
            return await axios({
                    method,
                    url,
                    data
                  });
            } catch (e) {
                return e.response
            }
        },
    notif(title, desc, icon){
        this.$swal(
            title,
            desc,
            icon
          )
    },
    confirmNotif(title = 'Are you sure?', text="You won't delete this ?", icon='warning', confirmButtonText='Yes, Delete it'){
        this.$swal({
            title,
            text,
            icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText
          }).then((result) => {
            if (result.isConfirmed) {
              this.$swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
    }
    },
   
}