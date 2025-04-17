<template>
	<div>
		<embed style="width: 100%; height: 100vh" :src="pdf" />
	</div>
</template>

<script>
	import Autocomplete from '@trevoreyre/autocomplete-vue'

	import '@trevoreyre/autocomplete-vue/dist/style.css'
    
    export default {
		components: {
			Autocomplete
		},
    	data(){
    		return{
    			page_mode : 1,
    			pdf : ""
    		};
    	},
		methods:{
			add_students(){
				console.log(this.mahasiswa_baru);
				this.mode = "loading";
    			axios.post(this.endpoint_insert_student,this.mahasiswa_baru)
    			.then(({data}) => {
    				console.log(data);
    				this.get_all_students();
    			})
			},
    		pdf_determine(){
    			this.pdf = "/storage/uploads/" + this.$route.params.id
    		}
		},
        mounted() {
        	this.pdf_determine();
        }
    }
</script>
