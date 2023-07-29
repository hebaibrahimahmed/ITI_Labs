#ifndef EMPLOYEELIST_H
#define EMPLOYEELIST_H

#include "MyList.h"
#include "Employee.h"

//template<class T1>
class EmployeeList : public MyList<Employee>
{
    public:
        EmployeeList() {}

        void Add(Employee emp)
        {
            if(emp.Salary < 3000)
                return;

            MyList::Add(emp);
        }

    protected:

    private:
};

#endif // EMPLOYEELIST_H
