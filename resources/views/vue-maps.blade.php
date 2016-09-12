<!DOCTYPE html>
<html>

	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.6.1/lodash.min.js"></script>
		<script src="js/vue-google-maps.js"></script>
	</head>
	<body>

		<google-map style="width: 100%; height: 100%; position: absolute; left:0; top:0"
		    :center="{lat: 20.6708361, lng:-103.2864634}"
		    :zoom="12">
		
		    <marker v-for="m in markers"
		      :position.sync="m.position"
		      :clickable="true"
		      :draggable="true"
		      @g-click="center=m.position">
		    </marker>

		</google-map>

		<script>
			VueGoogleMap.load({
			    'key': '{{ env('GOOGLE_API_KEY') }}',
			})
			Vue.component('google-map', VueGoogleMap.Map);
			new Vue({
			    el: 'body',
			    data: {
			    	'markers': [
			    		{
			    			'position': { lat: 48.8538302, lng: 2.2982161 }
			    		}
			    	]
			    }
			});
		</script>

	</body>

</html>