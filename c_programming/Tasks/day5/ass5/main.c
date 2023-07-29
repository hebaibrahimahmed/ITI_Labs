#include <stdio.h>
#include <stdlib.h>

typedef struct Employee
{
    int id, age, salary;
    char name[30], department[30];
}Employee;

 Employee addEmployeeDetails (Employee e)
{
    printf("Enter the id of the Employee: ");
    scanf("%d", &e.id);

    printf("Enter the age of the Employee: ");
     scanf("%d", &e.age);

    printf("Enter the name of the Employee: ");
    scanf("%s",e.name);

    printf("Enter the department of the Employee: ");
    scanf("%s",e.department);

    printf("Enter the salary of the Employee: ");
    scanf("%d", &e.salary);
    return e;
}

void printEmployeeDetails(Employee e)
{
    printf("\nEmployee Details:\n");
    printf("Employee Id: %d\n", e.id);
    printf("Employee Name: %s\n",e.name);
    printf("Employee age: %d\n", e.age);
    printf("Employee department: %s\n", e.department);
     printf("Employee salary: %d\n", e.salary);
}


int main()
{
    Employee e;

   e = addEmployeeDetails(e);

    printEmployeeDetails(e);

    return 0;
}
