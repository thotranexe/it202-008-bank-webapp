<table><tr><td> <em>Assignment: </em> M2 PHP-HW</td></tr>
<tr><td> <em>Student: </em> Tho Tran(tvt4)</td></tr>
<tr><td> <em>Generated: </em> 2/6/2022 11:27:55 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S22/m2-php-hw/grade/tvt4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <p>Make sure you have the dev/prod branches created before starting this assignment.</p>
<p>Setup steps:</p>
<ol>
<li><code>git checkout dev</code> </li>
<li><code>git pull origin dev</code></li>
<li><code>git checkout -b M2-PHP-HW</code></li>
</ol>
<p>You&#39;ll have 3 problems to save for this assignment.</p>
<p>Each problem you&#39;re given a template <strong>Do not edit anything in the template except where the comments tell you to</strong>.</p>
<p>The templates are done in such a way to make it easier to capture the output in a screenshot (if it&#39;s still not able to fit well, you can zoom out in your browser).</p>
<p>You&#39;ll copy each template into their own separate .php files, immediately git add, git commit these files (you can do it together) so we can capture the difference/changes between the templates and your additions. This part is required for full credit.</p>
<p>HW steps:</p>
<ol>
<li>Open VS Code at the root of your repository folder (you should see the Procfile and all from the Heroku setup)</li>
<li>In VS Code create a new folder/directory in public_html called M2</li>
<li>Create 3 new files in this new M2 folder (problem1.php, problem2.php, problem3.php)</li>
<li>Paste each template into their respective files</li>
<li><code>git add .</code></li>
<li><code>git commit -m &quot;adding template baselines</code></li>
<li>Do the related work (you may do steps 8 and 9 as often as needed or you can do it all at once at the end)</li>
<li><code>git add .</code></li>
<li><code>git commit -m &quot;completed hw&quot;</code></li>
<li>When you&#39;re done push the branch<ol>
<li><code>git push origin M2-PHP-HW</code></li>
</ol>
</li>
<li>Go to heroku dev, and manually deploy the M2-PHP-HW branch</li>
<li>After it deploys go to <a href="https://ucid-dev.herokuapp.com/M2/problem1.php">https://ucid-dev.herokuapp.com/M2/problem1.php</a> (replace ucid with your ucid if you followed the setup instructions)</li>
<li>Update the URL to check that each problem file displays properly</li>
<li>Create the Pull Request with <strong>dev</strong> as base and <strong>M2-PHP-HW</strong> as compare</li>
<li>Create a new file in the M2 folder in VS Code called m2_submission.md</li>
<li>Fill out the below deliverable items, save the submission, and copy to markdown<ol>
<li>For this assignment you may get screenshots from your heroku dev instance, you do not need to move it to prod then come back and update it</li>
</ol>
</li>
<li>Paste the markdown into the m2_submission.md</li>
<li>add/commit/push the md file<ol>
<li><code>git add m2_submission.md</code></li>
<li><code>git commit -m &quot;adding submission file&quot;</code></li>
<li><code>git push origin M2-PHP-HW</code></li>
</ol>
</li>
<li>Merge the pull request from step 14</li>
<li>Create a new pull request with prod as base and dev as compare</li>
<li>Immediately create/merge/confirm, this is just to deploy it to prod and you don&#39;t need to adjust anything during this step</li>
<li>On your local machine sync the changes<ol>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
</ol>
</li>
<li>Submit the link to the m2_submission.md file from the prod branch to Canvas</li>
</ol>
<p><strong>Template Files</strong>
You can find all 3 template files in this gist: <a href="https://gist.github.com/MattToegel/48b48377eaa1937c886b7840c449750a">https://gist.github.com/MattToegel/48b48377eaa1937c886b7840c449750a</a> </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Problem 1 - Only output Odd values of the Array under "Odds output" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 1 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/152723005-33b46215-f79d-4b2a-8df4-4930a91d41e4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Problem 1 of outputting odds only, with comma seperated values for clarity<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>using the inverse modular of 2=0, or if the value is not divisible<br>by 2 you can determine if the value is odd. By definition, an<br>odd value is one that is not divisible by 2<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Problem 2 - Only output the sum/total of the array values by assigning it to the $total variable (the number must end in 2 decimal places, if it ends in 1 it must have a 0 at the end) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 2 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/152723370-0e50f616-f27a-4e18-b77f-35a14e54759e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>problem 2, rounded totals <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>first, i added all the values of the array then rounded the value,<br>and to match the format requirements, I used number_format to set the min/max<br>decimal points to be 2.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Problem 3 - Output the given values as positive under the "Positive Output" message (the data otherwise shouldn't change) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Clearly screenshot the output of Problem 3 showing the data and the code output in the proper part of the page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/152723653-2343e610-32b9-4fb8-a8ed-acc1d4b2c9e5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>problem3 postive outputs only<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Describe how you solved the problem</td></tr>
<tr><td> <em>Response:</em> <p>for each value in an array, output the absolute value provided by abs<br>function and passing that into a different var to echo<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Misc Items </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add the prod URL for problem1.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/M2/problem1.php">https://tvt4-prod.herokuapp.com/M2/problem1.php</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the prod URL for problem2.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/M2/problem2.php">https://tvt4-prod.herokuapp.com/M2/problem2.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the prod URL for problem3.php (remember you can assume this based on how the domain gets built (i.e., ucid-prod.herokuapp.com/...)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/M2/problem3.php">https://tvt4-prod.herokuapp.com/M2/problem3.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Pull Request URL for M2-PHP-HW to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/thotranexe/it202-008/pull/3">https://github.com/thotranexe/it202-008/pull/3</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Talk about what you learned, any issues you had, how you resolve them</td></tr>
<tr><td> <em>Response:</em> <p>didn&#39;t run into any issues, mainly just that passphrase is case sensitive( i<br>hit caps lock by accident).  Echo can be difficult to output and<br>I&#39;ve got to do some research on formatting echos<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S22/m2-php-hw/grade/tvt4" target="_blank">Grading</a></td></tr></table>
