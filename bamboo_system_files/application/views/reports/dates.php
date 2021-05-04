<?php
$this->load->view('header');
?>
<h2><?php echo $this->lang->line('bambooinvoice_logo');?> <?php echo $page_title;?></h2>

<p><?php echo anchor('reports', $this->lang->line('reports_back_to_reports'));?></p>

<h3><?php echo $report_dates;?></h3>

<?php
/**
 * This will be added into Bamboo in the next iteration,
 * I just simply didn't have time for it this time around.
 *
 
<div><canvas id="pie1" height="400" width="400"></canvas></div>

<script type="text/javascript">

	// Define a dataset.
	var dataset = {
		'myFirstDataset': 	[[0, 3], [1, 2], [2, 1.414], [3, 2.3]],
		'mySecondDataset': 	[[0, 1.4], [1, 2.67], [2, 1.34], [3, 1.2]],
		'myThirdDataset': 	[[0, 0.46], [1, 1.45], [2, 1.0], [3, 1.6]],
		'myFourthDataset': 	[[0, 0.3], [1, 0.83], [2, 0.7], [3, 0.2]]
	};

	// Define options.
	var options = {
		// Define a padding for the canvas node
		padding: {left: 0, right: 0, top: 0, bottom: 0},

		// Background color to render.
		backgroundColor: '#f2f2f2',

		// Use the predefined blue colorscheme.
		colorScheme: 'blue',

		// Set the labels.
		xTicks: [
			{v:0, label:'January'}, 
			{v:1, label:'Februari'}, 
			{v:2, label:'March'},
			{v:3, label:'April'}
		]
	};

	// Instantiate a new PieCart.
	var pie = new Plotr.PieChart('pie1',options);
	// Add a dataset to it.
	pie.addDataset(dataset);
	// Render it.
	pie.render();

	// Change some attributes.
	Object.extend(options,{
		// Use the predefined grey colorscheme.
		colorScheme: 'grey',

		pieRadius: '0.2',

		// Background color to render.
		backgroundColor: '#d8efb0'
	});

	// Instead of instantiating a new PieChart object,
	// you also can use reset(), that resets the options and datasets.
	pie.reset();
	pie.addDataset(dataset);
	// Render the PieChart.
	pie.render('pie2', options);
</script>
*/
?>
<?php echo $data_table;?>

<p><?php echo anchor('reports', $this->lang->line('reports_back_to_reports'));?></p>

<?php
$this->load->view('footer');
?>