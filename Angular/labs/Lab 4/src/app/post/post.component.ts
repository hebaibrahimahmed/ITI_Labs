import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ServiceService } from '../app/Services/service.service';
import { Comment } from '../Interfaces/CommentInterface';
import { Post } from '../Interfaces/PostInterface';
@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.css']
})
export class PostComponent {
  post!: Post;
  comments!: Comment[];
constructor(private activatedRoute: ActivatedRoute , service : ServiceService){
  this.activatedRoute.paramMap.subscribe(params => {
    service.getPostById(Number(params.get('id'))).subscribe(post => {
     this.post =post
    })
 })
 this.activatedRoute.paramMap.subscribe(params => {
  service.getComments(Number(params.get('id'))).subscribe(comment => {
    this.comments = comment
  })
})
}
}
