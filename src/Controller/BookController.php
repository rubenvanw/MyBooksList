<?php

namespace App\Controller;


use App\Entity\Book;
use App\Form\BookFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private $em;
    private $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(Book::class);
    }

    #[Route('/', name: 'index')]
    public function index()
    {
        $books = $this->repository->findAll();
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('reading', name: 'reading')]
    public function reading()
    {
        $books = $this->repository->findBy(['status' => 'reading']);
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('completed', name: 'completed')]
    public function completed()
    {
        $books = $this->repository->findBy(['status' => 'completed']);
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('on-hold', name: 'on-hold')]
    public function onhold()
    {
        $books = $this->repository->findBy(['status' => 'on-hold']);
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('dropped', name: 'dropped')]
    public function dropped()
    {
        $books = $this->repository->findBy(['status' => 'dropped']);
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('plan to read', name: 'plan to read')]
    public function plantoread()
    {
        $books = $this->repository->findBy(['status' => 'plan to read']);
        return $this->render('index.html.twig', ['books' => $books]);
    }

    #[Route('create', name: 'create')]
    public function create(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookFormType::class, $book);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $newBook = $form->getData();
            $this->em->persist($newBook);
            $this->em->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('show/{id}', name: 'show')]
    public function show($id)
    {
        $book = $this->repository->find($id);
        return $this->render('show.html.twig', ['book' => $book]);
    }

    #[Route('edit/{id}', name: 'edit')]
    public function edit($id, Request $request)
    {
        $book = $this->repository->find($id);
        $form = $this->createForm(BookFormType::class, $book);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $book->setTitle($form->get('title')->getData());
            $book->setAuthor($form->get('author')->getData());
            $book->setPagecount($form->get('pagecount')->getData());
            $book->setStatus($form->get('status')->getData());
            $book->setDescription($form->get('description')->getData());

            $this->em->flush();
            return $this->redirectToRoute('index');
        }

        return $this->render('edit.html.twig', [
            'book' => $book,
            'form' => $form->createView()
        ]);
    }

    #[Route('delete/{id}', name: 'delete')]
    public function delete($id)
    {
        $book = $this->repository->find($id);
        $this->em->remove($book);
        $this->em->flush();
        return $this->redirectToRoute('index');
    }

}
