#include <iostream>
#include <string.h>

#include "MyList.h"
#include "Employee.h"
#include "EmployeeList.h"

using namespace std;

template<class T>
void Swap(T &x, T &y)
{
    T temp = x;
    x = y;
    y = temp;
}

template<class T>
T MyFunc(T x)
{

}

template<class T1, class T2, class T3>
T3 Test(T1 x, T2 y)
{

}

class MyException
{
public:

    MyException()
    {
        msg = new char[100];
    }

    int ErrorCode;
    char *msg;
};

int Divide(int x, int y)
{
    MyException ex;

    if(y == 0)
    {
        ex.ErrorCode = 0;
        strcpy(ex.msg, "Div by Zero");
        throw ex;
        //throw 0;
    }

    if(y % 10 == 0)
    {
        ex.ErrorCode = 1;
        strcpy(ex.msg, "Div by 10");
        throw ex;
        //throw 1;
    }

    if(y  > 50)
    {
        ex.ErrorCode = 3;
        strcpy(ex.msg, "Div by 50");
        throw ex;
        //throw 0;
    }
        //throw "Divide by 50 is not allowed";
        //throw new Employee();


    return x / y;
}

int main()
{
    /*int a = 3, b = 5;

    Swap<int>(a, b);

    //Swap<Employee>(K, L);

    int x = Test<float, char, int>(5.8, 'a');*/

    /*MyList<int> myList;
    //MyList<Employee> empList;

    //myList.Add(1);

    EmployeeList empList;

    Employee e1, e2, e3;
    e1.Salary = 5000;
    e2.Salary = 1500;
    e3.Salary = 4000;

    empList.Add(e1);
    empList.Add(e2);
    empList.Add(e3);*/

    try
    {
        Divide(5, 75);
    }
    /*catch(int errorCode)
    {
        if(errorCode == 0)
            cout << "Division by zero is not allowed";

        else if(errorCode == 1)
            cout << "Division by 10 is not allowed";
    }
    catch (const char *msg)
    {
        cout << msg;
    }*/
    catch(MyException ex)
    {
        cout << ex.ErrorCode << "  " << ex.msg;
    }
    catch(...)
    {
        cout << "Error Occurred";
    }

    return 0;
}
