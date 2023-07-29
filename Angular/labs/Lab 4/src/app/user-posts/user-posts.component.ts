import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { User } from '../Interfaces/UserInterface';
import { ServiceService } from '../app/Services/service.service';
import { Post } from '../Interfaces/PostInterface';

@Component({
  selector: 'app-user-posts',
  templateUrl: './user-posts.component.html',
  styleUrls: ['./user-posts.component.css']
})
export class UserPostsComponent {
  user!:User
  userPosts!:Post[]
  constructor(private activatedRoute: ActivatedRoute,private service:ServiceService){
    this.activatedRoute.paramMap.subscribe(params => {
       service.getUser(Number(params.get('id'))).subscribe(user => {
        this.user =user
       })
    })
  //   this.activatedRoute.paramMap.subscribe(params => {
  //     service.getPosts(Number(params.get('id'))).subscribe(post => {
  //       this.userPosts = post.filter(data =>data.userId==Number(this.activatedRoute.snapshot.paramMap.get('id')))
  //     })
  //  })

   this.activatedRoute.paramMap.subscribe(params => {
    service.getPosts(Number(params.get('id'))).subscribe(post => {
      this.userPosts = post
    })
 })
  
}
addPost(title:HTMLInputElement,body:HTMLInputElement){
  this.service.addPost(title, body,Number(this.activatedRoute.snapshot.paramMap.get('id')))
}

}
