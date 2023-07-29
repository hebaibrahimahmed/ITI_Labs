#ifndef MYLIST_H
#define MYLIST_H

template<class T>
class MyList
{
    T *items;
    int size, currentIndex;

public:
    MyList()
    {
        size = 10;
        currentIndex = -1;
        items = new T[size];
    }

    MyList(int size)
    {
        this->size = size;
        currentIndex = -1;
        items = new T[size];
    }

    virtual void Add(T item)
    {
        if(currentIndex == size - 1)
            Extend();

        currentIndex++;
        items[currentIndex] = item;
    }

    ~MyList()
    {
        delete items;
    }

private:

    void Extend()
    {
        T *temp = new T[size * 2];

        for(int index = 0; index < size; index++)
        {
            temp[index] = items[index];
        }

        size *= 2;
        delete items;
        items = temp;
    }
};

#endif // MYLIST_H
