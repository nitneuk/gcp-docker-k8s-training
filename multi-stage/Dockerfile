FROM alpine:latest as build
RUN apk add build-base
COPY hello.c /
RUN gcc hello.c

FROM alpine:latest
COPY --from=build /a.out .
CMD /a.out
