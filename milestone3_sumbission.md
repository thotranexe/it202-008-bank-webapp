<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Bank Project</td></tr>
<tr><td> <em>Student: </em> Tho Tran(tvt4)</td></tr>
<tr><td> <em>Generated: </em> 5/14/2022 12:14:54 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S22/it202-milestone-3-bank-project/grade/tvt4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to transfer between their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transfer page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409380-74d3c0df-76f8-4445-90ee-a3292bb32a25.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transfer page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing dropdown values</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409398-76759690-6540-422d-bb3a-11731ac62fd4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account list of all accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing user can't transfer more funds than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409713-c79aba3b-215d-47e5-83ab-830816bb8965.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>if statement if current bal &lt; withdrawl<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot showing user can't transfer to the same account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409733-28784392-5a72-48e4-9d5e-3c3c94ec351a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>string comparison if numbers are the same<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot showing you can't transfer an negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409778-dd6fb27e-d936-45af-a9d3-4c9adf92dd5d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>feild minium is 1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot of the generated transaction history from the db</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409864-24d758c5-6db0-4d70-9108-6b47806391fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction between two accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a screenshot of the Accounts table showing both affected accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409900-1d013995-4b89-44e1-93db-7a2ba3be4485.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>accounts in account table affected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code process/flow of a transfer including how the accounts are fetched for the dropdowns</td></tr>
<tr><td> <em>Response:</em> <p>select shows all accounts under the current user id using forech and db<br>queries., Grab both accounts using select, then query for required information, if all<br>is good proceed with the transaction.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/thotranexe/it202-008/pull/67">https://github.com/thotranexe/it202-008/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/project/transfer.php">https://tvt4-prod.herokuapp.com/project/transfer.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Transaction History Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transaction history page showing the new transfer transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409359-e2739ac9-7c94-4dbc-8e45-a8d030f784a3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transfer filter<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots demonstrating the filters and pagination</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168409108-ff51bc43-e933-4054-ab77-888988c39202.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filterd with flash messages to show what for<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how the filters/pagination work</td></tr>
<tr><td> <em>Response:</em> <p>required a date and filter type, once given set the vars into conditionals<br>with separate sql queries for each.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/thotranexe/it202-008/pull/67">https://github.com/thotranexe/it202-008/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/project/transaction_history.php">https://tvt4-prod.herokuapp.com/project/transaction_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's profile First name and Last name </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's profile with the new fields</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168428301-61b9023b-ac1f-4f33-9565-bd7619e5ed61.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>When name is set<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168428348-ba639e89-83dd-4e42-bd03-cc46dc254b32.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>when name hasnt been set already put form<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/thotranexe/it202-008/pull/68">https://github.com/thotranexe/it202-008/pull/68</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add link to profile page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/project/profile.php">https://tvt4-prod.herokuapp.com/project/profile.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to transfer funds to another user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the external transfer page with filled in data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168430083-6a63579f-ca52-4945-ab8f-9690750d0937.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transfer page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing user can't send more than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168430119-9eb9b5e4-a322-40b6-b9c0-649e1ba53022.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shows balance too low<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing they can't send a negative amount</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168430211-3436322b-e841-47a9-9459-9664c78b4bd8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>min is set to 1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) showing message if a user doesn't exist and/or a destination account wasn't found</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168430790-0ced7459-3477-4098-8611-53a52bae1809.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>no account found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of the transactions table showing the recorded transfer</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168439292-01fe9be3-5376-419a-84a9-0efac68e921c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account 0001 belongs to a user 1 account with random numbers belongs to<br>user 8.  <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot(s) showing the updated account balances</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168439391-93bc4b7f-1508-4468-98ee-37ab6cf4288b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>DB view of the new balances for simplicity sake, matches expected value from<br>previous screen shots.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the process of looking up the target user's account and the validation logic</td></tr>
<tr><td> <em>Response:</em> <p>use %like query to match input, once found query a joined table for<br>account id that belongs to user with last name<input>. from there transaction is<br>exactly like transfer but with acc_dest set to the account found from account<br>query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/thotranexe/it202-008/pull/69/commits">https://github.com/thotranexe/it202-008/pull/69/commits</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://tvt4-prod.herokuapp.com/project/external_transfer.php">https://tvt4-prod.herokuapp.com/project/external_transfer.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168439735-e72a076b-7a85-4355-bd08-3cde56371a52.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>4 delivarables<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98828992/168439840-239aa381-6bca-4cc5-acf8-f49532dc8ba9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S22/it202-milestone-3-bank-project/grade/tvt4" target="_blank">Grading</a></td></tr></table>
