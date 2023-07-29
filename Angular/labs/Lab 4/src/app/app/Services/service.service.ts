import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { User } from '../../Interfaces/UserInterface';
import { Post } from 'src/app/Interfaces/PostInterface';
import { Comment } from '../../Interfaces/CommentInterface';

@Injectable({
  providedIn: 'root',
})
export class ServiceService {
  constructor(private http: HttpClient) {}
  getAllUsers(): Observable<User[]> {
    return this.http.get<User[]>('https://jsonplaceholder.typicode.com/users', {
      headers: new HttpHeaders().set('Authorization', 'secret token'),
    });
  }

  getUser(id: number) {
    return this.http.get<User>(
      'https://jsonplaceholder.typicode.com/users/' + id,
      {
        headers: new HttpHeaders().set('Authorization', 'secret token'),
      }
    );
  }
  getPosts(id: number) {
    return this.http.get<Post[]>('https://jsonplaceholder.typicode.com/posts?userId='+id, {
      headers: new HttpHeaders().set('Authorization', 'secret token'),
    });
  }
  getPostById(id: number) {
    return this.http.get<Post>(
      'https://jsonplaceholder.typicode.com/posts/' + id,
      {
        headers: new HttpHeaders().set('Authorization', 'secret token'),
      }
    );
  }
  addPost(title: HTMLInputElement,body: HTMLInputElement,id:number) {
    this.http.post('https://jsonplaceholder.typicode.com/posts',{title: title.value, body: body.value,userId:id})
  }
  getComments(id: number) {
    return this.http.get<Comment[]>(
      'https://jsonplaceholder.typicode.com/comments?postId=' + id,
      {
        headers: new HttpHeaders().set('Authorization', 'secret token'),
      }
    );
  }
  }
