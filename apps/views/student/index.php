<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;utf-8" />
		<title>Sample App</title>
	</head>

	<body>
		<div id="container">
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php $ctr = 0; ?>
					<?php foreach($student_list as $student): ?>
						<?php $student->course->get()->order_by('name'); ?>
						<?php $ctr++ ?>
						<?php if($ctr % 2): ?>
						<tr>
							<td><?= $student->name ?></td>
							<td>
								<? foreach($student->course->all as $course): ?>
									<?= $course->name ?><br/>
									<? endforeach ?>
							</td>
						</tr>
						<?php else: ?>
						<tr class="odd">
							<td><?= $student->name ?></td>
							<td>
								<? foreach($student->course->all as $course): ?>
								<?= $course->name ?><br/>
								<? endforeach ?>
							</td>
						</tr>
						<?php endif; ?>
						<?php endforeach ?>
				</tbody>
			</table>
			
			<p class="pagination"><?= $this->pagination->create_links(); ?></p>
		</div>
	</body>
</html>