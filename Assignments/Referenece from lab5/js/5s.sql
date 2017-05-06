/*1.Add DepartmentID to Employee table */

/*2.Add DepartmentID ForeignKey constraint,referencing Department table*/

/*3. Add Current ManagerID to Employee table */

/*4. Add Current Manager ID ForeignKey constraint, referencing Employee table */

/*DATA MANIPULATION (DML) PART 1*/

/*5. Create SELECT statement that INNER JOINs the Employee table to the EmployeePay table*/
SELECT *
FROM `Employee`
INNER JOIN `EmployeePay`
LIMIT 0 , 30
/*6. Add to SELECT statement, inner joining Department table so you can add the department name to the SELECT*/
SELECT *
FROM `Department`
INNER JOIN `Employee`
INNER JOIN `EmployeePay`
LIMIT 0 , 30
/*DATA MANIPULATION (DML) PART 2*/

/*7. Add to SELECT statement, inner joining Employee table so you can add the manager name to the SELECT*/

/*DATA MANIPULATION (DML) PART 3*/

/*8. Create SELECT Statement that outer joins Employee to Employee Pay,
     making sure you are only showing the most recent Employee Pay record for each Employee row.
     You must add more than one row to the EmployeePay
     */
SELECT * FROM `EmployeePay` StartDate (SELECT MAX(StartDate)) OUTER JOIN `EMPLOYEE` 