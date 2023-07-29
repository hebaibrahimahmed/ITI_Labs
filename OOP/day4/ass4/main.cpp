#include <iostream>

using namespace std;

class List // array
{
    int *items; // pointer refer to the array if the array is full i will extend it ... and the new array i will save its place with new pointer

    int size, currentIndex;

public:
    static int Counter;

    List()
    {
        size = 10;
        currentIndex = -1;
        items = new int[size];

        Counter++;
    }

    List(int size) /// array wurde in constructor reserved
    {
        this->size = size;
        currentIndex = -1;
        items = new int[size];
        Counter++;
    }

    List(const List &L)
    {
        /*this->size = L.size;
        this->currentIndex = L.currentIndex;*/

        *this = L;

        this->items = new int[this->size];

        for(int index = 0; index < size; index++)
        {
            this->items[index] = L.items[index];
        }

        Counter++;
    }

    void Add(int item) // to add elements to the array

    {
        if(currentIndex == size - 1) // to know where i m in array and count the current with 1
            Extend();

        currentIndex++;
        items[currentIndex] = item;
    }

    ~List()
    {
        delete items;
        Counter--;
    }

private:

    void Extend()
    {
        int *temp = new int[size * 2];

        for(int index = 0; index < size; index++)
        {
            temp[index] = items[index];
        }

        size *= 2;
        delete items;
        items = temp;
    }
};

int List::Counter = 0;

void Test()
{
    List L1;
    L1.Add(3);

    cout << List::Counter << endl;
}

void MyFunc(List L)
{
    cout << List::Counter << endl;
}

List Foo(List L)
{
    List L10;


    return L10;
}


int main()
{
    List myList;

    /*myList.Add(3);
    myList.Add(5);
    myList.Add(6);*/

    //Test();

    MyFunc(myList); // i call the function and sent it an object mylist from class list (its stan alone function)
    List L2(myList);// object was created from another object then it will call the copy constructor

    // Assignments ??????
    List L3 = L2;  // bitwise copy or shallow copy will call the copy constuctor.
    List L4; // will not call the copy constuctor // will call the default constuctor.
    L4 = L2; // will call the default constuctor

    List L5 = Foo(myList); // function foo  3 times will call the copy cnstuctor and also the destuctor to kill the object L.

    L6 = Foo(myList); // will call the copy constuctor but 2 times

    cout << List::Counter;
    return 0;
}
